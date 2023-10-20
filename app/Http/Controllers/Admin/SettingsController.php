<?php

namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use App\Models\User;
use App\Models\Barangays;
use App\Models\Provinces;
use App\Models\AuditTrail;
use App\Models\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Municipalities;
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

        if ($dateFilter !== 'all') {
            $now = Carbon::now();

            if ($dateFilter === 'today') {
                $activitiesQuery->whereDate('created_at', $now->toDateString());
            } elseif ($dateFilter === 'yesterday') {
                $activitiesQuery->whereDate('created_at', $now->subDay()->toDateString());
            } elseif ($dateFilter === 'this_week') {
                $startOfWeek = $now->startOfWeek();
                $endOfWeek = $now->endOfWeek();
                $activitiesQuery->whereBetween('created_at', [$startOfWeek, $endOfWeek]);
            } elseif ($dateFilter === 'this_month') {
                $startOfMonth = $now->startOfMonth();
                $endOfMonth = $now->endOfMonth();
                $activitiesQuery->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
            }
        }

        $activities = $activitiesQuery->get();

        return view('admin.settings.audittrail', compact('activities'));
    }





    public function profile()
    {
        $user = Auth::user(); // Fetch the authenticated user
        $provinces = Provinces::all();
        $municipalities = Municipalities::all();
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
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validation failed.');
        }

        // Update the user's profile information
        $updatedAttributes = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
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

    public function performManualBackup(Request $request)
    {
        // Define the backup file name
        $backupFileName = 'backupdata_' . date('Y_m_d_His') . '.sql';

        // Define the path to mysqldump executable (use Laravel database configuration)
        $mysqlDumpPath = 'D:\xampp\mysql\bin\mysqldump.exe'; // Replace with your actual path
        $databaseConfig = config('database.connections.mysql');

        // Build the mysqldump command
        $command = "{$mysqlDumpPath} --user={$databaseConfig['username']} --host={$databaseConfig['host']} {$databaseConfig['database']} > " . storage_path('app/backup/') . $backupFileName;


        // Execute the mysqldump command
        exec($command, $output, $returnCode);

        if ($returnCode === 0) {
            // Backup completed successfully, create a response for download
            $backupFilePath = storage_path('app/backup/') . $backupFileName;
            if (file_exists($backupFilePath)) {
                $response = new Response(file_get_contents($backupFilePath), 200);
                $response->header('Content-Type', 'application/sql');
                $response->header('Content-Disposition', 'attachment; filename=' . $backupFileName);

                // Log the backup event
                Log::info('Manual backup completed successfully: ' . $backupFileName);

                // Delete the backup file after it's sent to the user
                unlink($backupFilePath);

                return $response;
            } else {
                Log::error('Manual backup file not found: ' . $backupFileName);
                return redirect()->back()->with('error', 'Manual backup failed. Backup file not found.');
            }
        } else {
            // Log and handle errors
            $errorOutput = implode("\n", $output);
            Log::error('Manual backup failed: ' . $errorOutput);

            return redirect()->back()->with('error', 'Manual backup failed. See logs for details.');
        }
    }

    public function scheduleAutomaticBackup(Request $request)
    {
        // Validate the request input
        $request->validate([
            'automatic_backup_date' => 'required|date',
        ]);

        // Define the mysqldump command with the full path to mysqldump executable
        $mysqlDumpPath = 'D:\xampp\mysql\bin\mysqldump.exe'; // Replace with your actual path

        // Define the database name
        $databaseName = env('MAO'); // Get the database name from your .env file

        // Build the mysqldump command
        $backupFileName = 'automatic_backup_' . date('Y_m_d_His') . '.sql';
        $command = "{$mysqlDumpPath} --user=root --host=127.0.0.1 {$databaseName} > " . storage_path('app/backup/') . $backupFileName;

        // Execute the mysqldump command
        shell_exec($command);

        // Set the path to the backup file
        $backupFilePath = storage_path('app/backup/') . $backupFileName;

        // Check if the backup file exists
        if (file_exists($backupFilePath)) {
            // Store the backup file in a storage location or cloud storage (e.g., Amazon S3)
            Storage::put('backups/' . $backupFileName, file_get_contents($backupFilePath));

            // Delete the local backup file after it's stored in the cloud
            unlink($backupFilePath);

            // You should define the monthly schedule within app/Console/Kernel.php
            // Example: Schedule::command('backup:run')->monthly();

            return redirect()->back()->with('success', 'Automatic backup scheduled successfully for ' . $request->input('automatic_backup_date'));
        } else {
            return redirect()->back()->with('error', 'Automatic backup failed. Backup file not found.');
        }
    }
}
