<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Report</title>
    <style>
        .print_page {
            width: 800px;
            height: 1000px;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }

        .top {
            margin-top: 100px;
        }

        .header .header_img img {
            display: inline;
            height: 150px;
            width: 200px;
            float: left;
            padding: 10px;
        }

        .header .header_text {
            width: 100px;
            height: 100px;
            display: inline;
            text-align: center;
        }

        .header_text .title {
            font-size: 35px;
            padding: 5px;
        }

        .header_text .address {
            padding: 5px;
            font-size: 20px;
        }

        .mobile,
        .email {
            font-size: 20px;
        }

        .address_table {
            margin-top: 50px;
            width: 100%;
        }

        .address_table,
        .address_table th,
        .address_table td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
            font-size: 20px;
        }

        .thank {
            border: 2px solid black;
            border-radius: 5px;
            padding: 15px;
            text-align: center;
            width: 700px;
            margin-top: 60px;
            margin-bottom: 40px;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }

        .content_table,
        th,
        td {
            padding: 5px;
            font-size: 20px;
        }

        .footer {
            margin-top: 150px;
            padding-bottom: 0px;
            float: right;
            display: block;
            clear: both;
        }

        .print {
            text-align: center;
            clear: both;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>

    <div class="print_page" id="print_page">
        <div class="top"></div>
        <div class="header">
            <div class="header_img">
                <img src="image/logo/logo.png" alt="">
            </div>
            <div class="header_text">
                <div class="title">আমজাদ আলী মেমোরিয়াল ফাউন্ডেশন</div>
                <div class="address">ইমাদপুর, পয়ারী, ফুলপুর, ময়মনসিংহ</div>
                <div class="mobile">মোবাইল : ০১৭১১৮২৪৬৩৩</div>
                <div class="email">Email : mhoque10@gmail.com</div>
            </div>
        </div>

        <table class="address_table">
            <tr>
                <td>Pt. ID</td>
                <td>{{$pregnancyProfile->patient->id}}</td>
                <td>Date: </td>
                <td>{{ \Carbon\Carbon::parse($pregnancyProfile->created_at)->format('d/m/Y') }}</td>
                <td>Age:</td>
                <td colspan="2">{{$pregnancyProfile->patient->age}} Years</td>
            </tr>
            <tr>
                <td>Pt. Name</td>
                <td colspan="3">{{$pregnancyProfile->patient->name}}</td>
                <td>Gender:</td>
                <td>{{$pregnancyProfile->patient->gender}}</td>

            </tr>
            <tr>
                <td>Ref. By</td>
                <td colspan="5">{{$pregnancyProfile->user->name}}</td>

            </tr>
            <tr>
                <td>Name of Exam</td>
                <td colspan="5"> USE OF KUB &amp; PVR</td>

            </tr>
        </table>

        <h3 class="thank">Thank you for the courtesy of this kind referral</h3>


        <table class="content_table">
            Uterus is gravid containing single viable foetus.
            <tr>
                <td>BPD</td>
                <td>:</td>
                <td>
                    <strong>{{$pregnancyProfile->bpd}} cm </strong>corresponding to
                    <strong>{{$pregnancyProfile->bpd_week}} weeks </strong>
                    <strong>{{$pregnancyProfile->bpd_day}} days </strong>of gestation.
                </td>
            </tr>
            <tr>
                <td>HC</td>
                <td>:</td>
                <td>
                    <strong>{{$pregnancyProfile->hc}} cm </strong>corresponding to
                    <strong>{{$pregnancyProfile->hc_week}} weeks </strong>
                    <strong>{{$pregnancyProfile->hc_day}} days </strong>of gestation.
                </td>
            </tr>
            <tr>
                <td>AC</td>
                <td>:</td>
                <td>
                    <strong>{{$pregnancyProfile->ac}} cm </strong>corresponding to
                    <strong>{{$pregnancyProfile->ac_week}} weeks </strong>
                    <strong>{{$pregnancyProfile->ac_day}} days </strong>of gestation.
                </td>
            </tr>
            <tr>
                <td>FL</td>
                <td>:</td>
                <td>
                    <strong>{{$pregnancyProfile->fl}} cm </strong>corresponding to
                    <strong>{{$pregnancyProfile->fl_week}} weeks </strong>
                    <strong>{{$pregnancyProfile->fl_day}} days </strong>of gestation.
                </td>
            </tr>
        </table>
        <ul>
            <li>Average duration of pregnency is about
                <strong>{{$pregnancyProfile->pregnency_week}} weeks </strong>
                <strong>{{$pregnancyProfile->pregnency_day}} days.</strong>
            </li>
            <li>According to LMP the gestational age is about
                <strong>{{$pregnancyProfile->lmp_week}} weeks </strong>
                <strong>{{$pregnancyProfile->lmp_day}} days.</strong>
            </li>
            <li>EDD from composite getational age is =
                <strong>{{$pregnancyProfile->edd}} </strong>( Approx)
            </li>
            <li>Placenta is noted in anterior uterine wall and shows grade II maturity.</li>
            <li>Placenta is away from internal OS.</li>
            <li>Amniotic fluid is adequate
                <strong>(AFI - {{$pregnancyProfile->afi}} cm).</strong>
            </li>
            <li>Active foetal movements and cardiac pulsation are seen.</li>
            <li>Foetal heart is
                <strong>{{$pregnancyProfile->heart}} bpm, </strong>regular.
            </li>
            <li>EFW by sonography is
                <strong>{{$pregnancyProfile->efw}} gms. </strong>
            </li>
        </ul>
        <ul>
            <li>Umbilical Doppler study shows normal foeto-placental circulation
                <strong>({{$pregnancyProfile->ri}}) </strong>Diastolic flow is normal.
            </li>
            <li>No obvious fetal anomaly is noted at present.</li>
            <strong><u>Impression: </u></strong>
            <li>
                <strong>About {{$pregnancyProfile->impression}}+ weeks of single viable pregnancy with cephalic presentation.</strong>
            </li>
        </ul>

        <div class="footer">
            <h3>{{$pregnancyProfile->seenBy->name}}</h3>
            <p>MBBS (DU), MD ( Radiology)</p>
            <p>Junior Consultant, Radiology &amp; Imaging</p>
        </div>
    </div>

    <input class="print btn btn-info px-5" type="button" onclick="printDiv('print_page')" value="Print">

    <br>

    <script>
        function printDiv(print_page) {
            var printContents = document.getElementById(print_page).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</body>
</html>
