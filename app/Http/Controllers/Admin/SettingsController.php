<?php

namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use App\Models\User;
use App\Models\Barangays;
use App\Models\provinces;
use App\Models\AuditTrail;
use App\Models\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\municipalities;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Validator;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\DbDumper\Databases\MySql;
use Illuminate\Support\Facades\File;


date_default_timezone_set('Asia/Manila');
class SettingsController extends Controller
{

    use LogsActivity;

    /**
     * Display a listing of the resource.
     */

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'username', 'user_type']);
    }
    /**
     * Display a listing of the resource.
     */

public function audit(Request $request)
{
    $dateFilter = $request->input('date_filter');
    $activitiesQuery = Activity::orderBy('created_at', 'desc');

    // Check if it's the last day of the month
    $now = Carbon::now();
    $isLastDayOfMonth = $now->isLastOfMonth();

    if ($isLastDayOfMonth) {
        // Perform actions to reset or clear the audit trail data
        // For example, you can truncate the table or delete records
        DB::table('activity_log')->truncate(); // This will delete all records in the 'activities' table
    }

    if ($dateFilter !== 'all') {
        if ($dateFilter === 'today') {
            $activitiesQuery->whereDate('created_at', $now->toDateString());
        } elseif ($dateFilter === 'yesterday') {
            $activitiesQuery->whereDate('created_at', $now->subDay()->toDateString());
        } elseif ($dateFilter === 'this_week') {
            $startOfWeek = $now->startOfWeek()->toDateString();
            $endOfWeek = $now->endOfWeek()->toDateString();
            $activitiesQuery->whereBetween('created_at', [$startOfWeek, $endOfWeek]);
        } elseif ($dateFilter === 'this_month') {
            $startOfMonth = $now->startOfMonth()->toDateString();
            $endOfMonth = $now->endOfMonth()->toDateString();
            $activitiesQuery->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
        }
    }

    // Use chunk to process the records in smaller batches
    $activities = [];
    $activitiesQuery->chunk(200, function ($chunk) use (&$activities) {
        foreach ($chunk as $activity) {
            // Process each activity
            // You can move your existing code logic here
            $activities[] = $activity; // Store the processed activity
        }
    });

    return view('admin.settings.audittrail', compact('activities'));
}






    public function profile()
    {
        $user = Auth::user(); // Fetch the authenticated user
        $provinces = provinces::all();
        $municipalities = municipalities::all();
        $barangays = Barangays::all();
        // Fetch additional data as needed
        $someData = User::where('id', $user->id)->get(); // Replace with your actual query

        return view('admin.settings.profile', compact('user', 'provinces', 'municipalities', 'barangays', 'someData'));
    }


    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the form data for updating user details
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone_number' => 'required|numeric',
            'provinces_id' => 'required',
            'municipalities_id' => 'required',
            'barangays_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validation failed.');
        }

        // Update the user's profile information
         $updatedAttributes = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'barangays_id' => $request->input('barangays_id'), // Add this line
        ];

        // Handle profile image upload if a new image was provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = base64_encode(file_get_contents($image->getPathname()));

            // Update the user's profile image data in the database
            $user->image = $imageData;
            $user->save();
        }

        activity()
            ->causedBy(auth()->user()) // Assuming you're logged in
            ->performedOn($user) // The user being updated
            ->withProperties(['attributes' => $updatedAttributes]) // Include updated attributes
            ->log('Updated his/her profile');

        // Update the user's attributes
        $user->update($updatedAttributes);

        return redirect('profile')->with('success', 'Profile updated successfully');
    }


    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Error occurred during password update.');
        }

        // Verify the current password
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withInput()->with('error', 'Current password is incorrect.');
        }

        $updatedAttributes = [
            'password' => bcrypt($request->input('new_password')),
        ];

        activity()
            ->causedBy(auth()->user()) // Assuming you're logged in
            ->performedOn($user) // The user being updated
            ->withProperties(['attributes' => $updatedAttributes]) // Include updated attributes
            ->log('Updated his/her password');

        // Update the user's attributes
        $user->update($updatedAttributes);

        // Redirect to a success page or show a success message
        return redirect('profile')->with('success', 'Password updated successfully.');
    }



   public function backup()
    {
        return view('admin.settings.sysbackup');
    }

public function backupDatabase()
{
    try {
        // Database config
        $host = config('database.connections.mysql.host');
        $user = config('database.connections.mysql.username');
        $pass = config('database.connections.mysql.password');
        $db = config('database.connections.mysql.database');

        $backupPath = storage_path('app/backup_' . date('Y_m_d_His') . '.sql');

        // Connect with mysqli
        $mysqli = new \mysqli($host, $user, $pass, $db);

        if ($mysqli->connect_error) {
            throw new \Exception('Connection failed: ' . $mysqli->connect_error);
        }

        $mysqli->set_charset('utf8');

        $tables = [];
        $result = $mysqli->query("SHOW TABLES");
        while ($row = $result->fetch_array()) {
            $tables[] = $row[0];
        }

        $sqlDump = "";

        foreach ($tables as $table) {
            // Get CREATE TABLE statement
            $res = $mysqli->query("SHOW CREATE TABLE `$table`");
            $row = $res->fetch_assoc();
            $sqlDump .= "\n\n" . $row['Create Table'] . ";\n\n";

            // Get data from table
            $res = $mysqli->query("SELECT * FROM `$table`");

            while ($row = $res->fetch_assoc()) {
                $columns = array_keys($row);
                $values = array_values($row);

                // Escape values for SQL
                $escapedValues = array_map(function($value) use ($mysqli) {
                    if ($value === null) return "NULL";
                    return "'" . $mysqli->real_escape_string($value) . "'";
                }, $values);

                $sqlDump .= "INSERT INTO `$table` (`" . implode('`,`', $columns) . "`) VALUES (" . implode(',', $escapedValues) . ");\n";
            }
        }

        // Save dump to file
        file_put_contents($backupPath, $sqlDump);

        $mysqli->close();

        return response()->download($backupPath)->deleteFileAfterSend(true);
    } catch (\Exception $e) {
        return back()->with('error', 'Backup error: ' . $e->getMessage());
    }
}

public function restoreDatabase(Request $request)
{
    $request->validate([
        'database_file' => 'required|file|mimes:sql,txt',
    ]);

    $db = config('database.connections.mysql.database');
    $user = config('database.connections.mysql.username');
    $pass = config('database.connections.mysql.password');
    $host = config('database.connections.mysql.host');
    $filePath = $request->file('database_file')->getRealPath();

    // Connect to MySQL
    $mysqli = new \mysqli($host, $user, $pass, $db);

    if ($mysqli->connect_error) {
        return back()->with('error', 'Connection failed: ' . $mysqli->connect_error);
    }

    $mysqli->set_charset('utf8');

    // Read the entire SQL file
    $sql = file_get_contents($filePath);
    if ($sql === false) {
        return back()->with('error', 'Failed to read the SQL file.');
    }

    // Split SQL statements
    // This is a simple splitter; you might want a more robust parser for complex dumps.
    $statements = array_filter(array_map('trim', preg_split('/;[\r\n]+/', $sql)));

    foreach ($statements as $statement) {
        if (!empty($statement)) {
            if (!$mysqli->query($statement)) {
                return back()->with('error', 'Error executing query: ' . $mysqli->error);
            }
        }
    }

    $mysqli->close();

    return back()->with('success', 'Database restored successfully.');
}


}
