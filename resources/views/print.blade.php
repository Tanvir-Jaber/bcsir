<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BCSIR</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="IIdea Informatics">

    <link rel="icon" href="common/img/favicon.png" type="image/gif">
</head>

<body>

    @php
        $visit = null;
    @endphp

    <!--Prescription -->
    <div class="prescription" style="max-width: 800px; padding: 20px; margin: 50px auto; xborder: 1px solid #eee;">
        <div class="header">
            <div xstyle="position: relative" class="row">
                <div class="col-lg-6">
                    <div class="logo" style="display:none;text-align:center">
                        <img style="width:10%" src="{{ asset('logo.png') }}" alt="logo not found">
                        <h5 style="text-transform: uppercase;font-weight: 700;font-size: 18px; margin:0px ">
                            <span>
                                বাংলাদেশ বিজ্ঞান ও শিল্প গবেষণা পরিষদ (বিসিএসআইআর) <br> Bangladesh Council of Scientific
                                and Industrial Research
                            </span>
                            {{-- <span style="color: #2B8FE5;">BCS</span>IR<span style="color: #2B8FE5;"></span> --}}
                        </h5>
                    </div>
                </div>
                <div style="position: absolute;top: 35px;right: 30px;" class="col-lg-6">
                    <div class="logo" xstyle="margin-bottom: 15px;">
                        <img height="75" width="75" src="{{ asset($data->image) }}" alt="logo not found">
                        <br>
                        <span style="font-size: 10px;display:none;text-align:center">bcsir-ctg#{{ $data->id }}</span>

                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="doctor-summary d-flex justify-content-between align-items-end">
            <div class="doctor-dtl">
                <h6 class="name" style="color: #1A3D7D;font-weight: 600;margin-bottom: 0;">
                    {{ $visit }}</h6>

                <p style="color: #2B8FE5;font-family: 'Roboto', sans-serif;font-size: 15px;font-weight: 400;margin: 0;">
                    {{ $visit }}</p>

                <p style="font-family: 'Roboto', sans-serif;font-size: 15px;font-weight: 400;color: #848E9F;margin: 0;">
                    {{ $visit }}</p>
            </div>

            <div class="contact-info">
                <p class="phone"
                    style="font-family: 'Roboto', sans-serif;font-size: 15px;font-weight: 400;color: #848E9F;margin: 0;">
                    @lang('visit-pdf-template.Phone'): {{ $visit }}</p>

                <p class="mail"
                    style="font-family: 'Roboto', sans-serif;font-size: 15px;font-weight: 400;color: #848E9F;margin: 0;">
                    @lang('visit-pdf-template.E-mail'): {{ $visit }}</p>
            </div>
        </div> --}}

        <div xstyle="margin-top: 50px;">
            {{-- <hr> --}}
        </div>

        {{-- <div class="recipe" style="margin-top: 20px; margin-bottom: 30px;">
            <h4 style="position: relative; color: #565656;">R <span
                    style="font-size: 18px; position: absolute; bottom: -2px;">x</span></h4>
        </div>

        <h3 class="section-head"
            style=" font-size: 16px;background: #def0f8;padding: 10px;margin: 20px 0 5px;border-radius: 5px;color: #1A3D7D;font-weight: 600;margin-bottom: 0;">
            @lang('visit-pdf-template.Patient Information'):</h3>

        <div class="patient-dtl ">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex flex-wrap pl-3 pt-1">
                        <div class="form-group col-md-4 col-lg-4 pl-0">
                            <p
                                style="font-family: 'Roboto', sans-serif;font-size: 15px;font-weight: 400;color: #848E9F;margin: 0;">
                                <strong>@lang('visit-pdf-template.Patient Name'):</strong> {{ $visit }}
                            </p>
                        </div>

                        <div class="form-group col-md-4 col-lg-4 pl-0">
                            <p
                                style="font-family: 'Roboto', sans-serif;font-size: 15px;font-weight: 400;color: #848E9F;margin: 0;">
                                <strong>@lang('visit-pdf-template.Contact No'):</strong> {{ $visit }}
                            </p>
                        </div>

                        <div class="form-group col-md-4 col-lg-4 pl-0">
                            <p
                                style="font-family: 'Roboto', sans-serif;font-size: 15px;font-weight: 400;color: #848E9F;margin: 0;">
                                <strong>D.O.B:</strong>
                                @php
                                    // new DateTime("2-2-2020 10:34:11")
                                    $dateTime = new DateTime();
                                    // $dateTime->format('d-m-Y') --> removing time from $dateTime
                                    echo $dateTime->format('d-m-Y');
                                @endphp
                            </p>
                        </div>

                        <div class="form-group col-md-4 col-lg-4 pl-0">
                            <p
                                style="font-family: 'Roboto', sans-serif;font-size: 15px;font-weight: 400;color: #848E9F;margin: 0;">
                                <strong>@lang('visit-pdf-template.E-mail'):</strong> {{ $visit }}
                            </p>
                        </div>

                        <div class="form-group col-md-4 col-lg-4 pl-0">
                            <p
                                style="font-family: 'Roboto', sans-serif;font-size: 15px;font-weight: 400;color: #848E9F;margin: 0;">
                                <strong>@lang('visit-pdf-template.Gender'):</strong> {{ $visit }}
                            </p>
                        </div>

                        <div class="form-group col-md-4 col-lg-4 pl-0">
                            <p
                                style="font-family: 'Roboto', sans-serif;font-size: 15px;font-weight: 400;color: #848E9F;margin: 0;">
                                <strong>@lang('visit-pdf-template.Blood Group'):</strong> {{ $visit }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>






        </div>

        <h3 class="section-head"
            style=" font-size: 16px;background: #def0f8;padding: 10px;margin: 20px 0 5px;border-radius: 5px;color: #1A3D7D;font-weight: 600;margin-bottom: 0;">
            @lang('visit-pdf-template.Doctors Notes'):</h3>
        <div class="row pl-3">
            <div class="col-md-10">
                <p style="font-family: 'Roboto', sans-serif;font-size: 15px;font-weight: 400;color: #848E9F;margin: 0;">
                    {{ $visit }}</p>
            </div>
        </div>

        <h3 class="section-head"
            style=" font-size: 16px;background: #def0f8;padding: 10px;margin: 20px 0 5px;border-radius: 5px;color: #1A3D7D;font-weight: 600;margin-bottom: 0;">
            @lang('visit-pdf-template.Prescription'):</h3>

        <div class="row pl-3">
            <div class="col-md-10">
                <p style="font-family: 'Roboto', sans-serif;font-size: 15px;font-weight: 400;color: #848E9F;margin: 0;">
                    {{ $visit }}</p>
            </div>
        </div>


        <h3 class="section-head"
            style=" font-size: 16px;background: #def0f8;padding: 10px;margin: 20px 0 5px;border-radius: 5px; color: #1A3D7D;font-weight: 600;margin-bottom: 0;">
            @lang('visit-pdf-template.Diagnosis Tests'):</h3>
        <p class="pl-3"
            style="font-family: 'Roboto', sans-serif;font-size: 15px;font-weight: 400;color: #848E9F;margin: 0;">
            @lang('visit-pdf-template.Please examine the following medical tests'):</p>

        <div class="row pl-3">
            <div class="col-md-10">
                <p style="font-family: 'Roboto', sans-serif;font-size: 15px;font-weight: 400;color: #848E9F;margin: 0;">
                    {{ $visit }}</p>
            </div>
        </div>

        <div style="height: 50px;"></div>
        <div class="signature">
            <p style="font-family: 'Roboto', sans-serif;font-size: 15px;font-weight: 400;color: #848E9F;margin: 0;">
                @lang("visit-pdf-template.Doctor's Signature"):______________________</p>
        </div> --}}
    </div>

    <script>
        (function() {
            window.print();
            var afterPrint = function() {
                window.top.close();

            };

            if (window.matchMedia) {
                var mediaQueryList = window.matchMedia('print');
                mediaQueryList.addListener(function(mql) {
                    if (!mql.matches) {
                        afterPrint();
                    }
                });
            }
            window.onafterprint = afterPrint;

        }());
    </script>

</body>

</html>
