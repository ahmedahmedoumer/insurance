
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Vehicle Insurance</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.jpg" />
        <!-- Bootstrap icons-->
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>

        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <h5 class="text-light "><a href="#"><span>Vehicle Insurance</span></a></h5>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="@if (isset($customer_account))
                            @foreach ($customer_account as $item)
                              {{ "/_".$item->id."_home_page"}}
                          @endforeach
                          @endif">Home</a></li>
                        <li class="nav-item active"><a class="nav-link"  href=" @if (isset($customer_account))
                            @foreach ($customer_account as $item)
                              {{ " /customer/register_".$item->id}}
                          @endforeach
                          @endif
                            ">Registeration</a></li>
                        <li class="nav-item active"> <a href="
                            @if (isset($customer_account))
                            @foreach ($customer_account as $item)
                              {{ "/customer/accident_".$item->id."_report_page"}}
                          @endforeach
                          @endif
                           " class="nav-link" >Accident Report</a></li>
                        <li class="nav-item active"> <a href="
                            @if (isset($customer_account))
                                 @foreach ($customer_account as $item)
                                   {{ "/customer/view_". $item->id."_profile"}}
                               @endforeach
                           @endif "
                             class="nav-link active" >Approval view</a></li>
                        <li class="nav-item"> <a href="
                            @if (isset($customer_account))
                                     @foreach ($customer_account as $item)
                                       {{ "/customer/give_comment_page_". $item->id}}
                                   @endforeach
                               @endif
                            " class="nav-link active" >Give Comment</a></li>
                        <li class="nav-item"><a href="
                            @if (isset($customer_account))
                                 @foreach ($customer_account as $item)
                                   {{ "/customer/view_my_". $item->id."_contract"}}
                               @endforeach
                           @endif "
                            class="nav-link active" >View Contract</a></li>
                        <li class="nav-item"><a href="
                            @if (isset($customer_account))
                            @foreach ($customer_account as $item)
                                   {{ "/customer/view_". $item->id."_notice"}}
                            @endforeach
                            @endif "
                             class="nav-link active" >View Notices</a></li>

                             <li class="nav-item active"> <a href="@if (isset($customer_account))
                                @foreach ($customer_account as $item)
                                       {{ "/customer/show_". $item->id."_notification"}}
                                @endforeach
                                @endif" class="nav-link" >show notification</a></li>
                                <li class="nav-item active"> <a href="/customer/contact" class="nav-link" >Contact</a></li>
                        <li style="background-color: rgb(116, 109, 109);" class="nav-item active rounded-circle"> <a  href="/customer/logout" class="nav-link rounded" >logout</a></li>


                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class=" py-5">
            @yield('customer')

        </header>
        <!-- Features section-->

        <!-- Footer-->

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>
