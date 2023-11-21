<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table{
            font-size: x-small;
            border-collapse: collapse;

        }
        table td{
            border: 1px solid black;
            padding: 5px;
        }
        table th{
            border: 1px solid black;

        }

        .gray {
            background-color: lightgray
        }
        .bold{
            font-weight: bold;
        }
        .center {
            text-align: center;
        }
        .center-text {
        text-align: center;
        margin: 0 auto;
        display: block;
    }
    td{
        font-weight: bold;
        font-size: 14px;
    }
    span{
        font-weight: 0;
        font-size: 12px;
    }
    </style>
</head>
<body>
    <div class="center-text">
        {{-- <img src="../asset" alt="Logo" style="height: 50px; width: 50px; margin-right: 10px;"> --}}
        <h1 class="center-text" style="display: inline-block;">Balaoan Farmers Registry</h1>
    </div>


    <table width="100%">
        <tbody>
            <tr>
                <td style="font-style: italic;">Reference/Control No.: <span>{{ $farmersprofile->ref_no }}</span> </td>
            </tr>
        </tbody>
    </table>


    <table width="100%">
        <tbody>
          <tr>
            <td class="bold">PART 1: PERSONAL INFORMATION</td>
          </tr>
        </tbody>
      </table>


    <table width="100%">
        <tbody>
            <tr>
                <td width="50%">Surname: <span>{{ $farmersprofile->sname }} </span></td>
                <td width="50%">Firstname: <span>{{ $farmersprofile->fname }}</span></td>
            </tr>
        </tbody>
    </table>
    <table width="100%">
        <tbody>
            <tr>
                <td width="50%">Middlename: <span>{{ $farmersprofile->mname }}</span> </td>
                <td width="25%">Extension name: <span>{{ $farmersprofile->ename }}</span></td>
                <td width="25%">Sex: <span>{{ $farmersprofile->sex }}</span></td>
            </tr>
        </tbody>
    </table>
    <table width="100%">
        <tbody>
          <tr>
            <td class="bold">ADDRESS: <span style="font-weight: 0;">{{ $farmersprofile->barangay->barangays }}, {{ $farmersprofile->municipalities_id }}, {{ $farmersprofile->provinces_id}}</span></td>
          </tr>
        </tbody>
      </table>
      <table width="100%">
        <tbody>
            <tr>
                <td width="50%">Contact Number: <span>{{ $farmersprofile->number }} </span></td>
                <td width="50%">Highest Formal Education: <span>{{ $farmersprofile->education }}</span></td>
            </tr>
        </tbody>
    </table>
    <table width="100%">
        <tbody>
            <tr>
                <td width="50%">Date of Birth: <span>{{ $farmersprofile->dob }}</span> </td>
                <td width="50%">Place of Birth: <span>{{ $farmersprofile->pob }}</span></td>
            </tr>
        </tbody>
    </table>
    <table width="100%">
        <tbody>
            <tr>
                <td width="33.3%">Religion: <span>{{ $farmersprofile->religion }} </span></td>
                <td width="33.3%">Person with Disability(PWD):<span>{{ $farmersprofile->pwd }}</span></td>
                <td width="33.3%">4p's Beneficiaries: <span>{{ $farmersprofile->benefits }}</span></td>
            </tr>
        </tbody>
    </table>
    <table width="100%">
        <tbody>
            <tr>
                <td width="50%">Civil Status: <span>{{ $farmersprofile->civil_status->status }} </span></td>
                <td width="50%">Name of Spouse if Married: <span>{{ $farmersprofile->spouse }}</span></td>
            </tr>
        </tbody>
    </table>
    <table width="100%">
        <tbody>
            <tr>
                <td width="50%">Contact No. Incase of Emergency: <span>{{ $farmersprofile->emergency }}</span></td>
                <td width="50%">Mother's Maiden Name: <span>{{ $farmersprofile->mother }}</span></td>
            </tr>
        </tbody>
    </table>
    <table width="100%">
        <tbody>
          <tr>
            <td class="bold">PART II: FARMERS PROFILE</td>
          </tr>
        </tbody>
      </table>
      <table width="100%">
        <tbody>
          <tr>
            <td class="bold">Main Livelihood: <span style="font-weight: 0;">{{ $farmersprofile->livelihood }}</span></td>
          </tr>
        </tbody>
      </table>
      <table width="100%">
        <tbody>
          <tr>
            <td class="bold" style="text-align: center">Type of Farming Activity</span></td>
          </tr>
        </tbody>
      </table>
      <table width="100%">
        <thead>
            <tr>
                <td width="33.3%">Crops</td>
                <td width="33.3%">Farm Size</td>
                <td width="33.3%">Farm Location</td>
            </tr>
        </thead>
        <tbody>
            @foreach($crops as $crop)
                @if ($crop->farm_size && $crop->farm_location)
                    <tr>
                        <td><span>{{ $crop->commodity->commodities }}</span></td>
                        <td><span>{{ $crop->farm_size }}</span></td>
                        <td><span>{{ $crop->farm_location }}</span></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

      {{-- <table width="100%">
        <thead>
            <tr>
                <td width="33.3%">Crops</td>
                <td width="33.3%">Farm Size</td>
                <td width="33.3%">Farm Location</td>
            </tr>
        </thead>
        <tbody>
            @foreach($crops as $crop)
                <tr>
                    <td><span>{{ $crop->commodity->commodities }}</span></td>
                    <td><span>{{ $crop->farm_size }}</span></td>
                    <td><span>{{ $crop->farm_location }}</span></td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
    <table width="100%">
        <tbody>
          <tr>
            <td class="bold" style="text-align: center">Machineries</span></td>
          </tr>
        </tbody>
      </table>
      <table width="100%">
        <thead>
            <tr>
                <td width="33.3%">Machineries</td>
                <td width="33.3%">No. of Units</td>
            </tr>
        </thead>
        <tbody>
            @foreach($machineries as $machinery)
                <tr>
                    <td><span>{{ $machinery->machine->machine }}</span></td>
                    <td><span>{{ $machinery->units }}</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table width="100%">
        <tbody>
            <tr>
                <td width="50%" class="bold" style="text-align: center">Gross Annual Income Last Year </td>
            </tr>
        </tbody>
    </table>
    <table width="100%">
        <tbody>
            <tr>
                <td width="50%">Farming: <span>{{ $farmersprofile->gross}}</span></td>
                <td width="50%">Non-Farming: <span>{{ $farmersprofile->grosses}}</span></td>
            </tr>
        </tbody>
    </table>
    <table width="100%">
        <tbody>
            <tr>
                <td width="50%">No. Of Parcels: <span>{{ $farmersprofile->parcels}}</span></td>
                <td width="50%">Agrarian Reform Beneficiaries: <span>{{ $farmersprofile->arb}}</span></td>
            </tr>
        </tbody>
    </table>
    <table width="100%">
        <tbody>
            <tr>
                <td width="5%"></td>
                <td width="95%">I hereby declare that all information indicated above is true and correct,
                    and that they may be used by Municipal Agriculurist Office of Balaoan, La
                    Union for the purposes of registration to the Registry System for Basic
                    Sectors in Agriculture (RSBSA) and other legitimate interests of the
                    Department pursuant to its mandates.</td>
            </tr>
        </tbody>
    </table>
    <table width="100%">
        <tbody>
            <tr>
                <td width="25%" style="height: 100px;"></td>
                <td width="25%"></td>
                <td width="25%"></td>
                <td width="25%"></td>
            </tr>
        </tbody>
        <tfoot style="text-align: center;">
            <tr>
                <td width="15%">DATE</td>
                <td width="40%">PRINTED NAME OF APPLICANTS</td>
                <td width="30%">SIGNATURE OF APPLICANT</td>
                <td width="15%">THUMBMARK</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
