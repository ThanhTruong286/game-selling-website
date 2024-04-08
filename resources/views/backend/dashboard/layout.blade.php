<!DOCTYPE html>
<html>
<head>

    @include('backend.dashboard.component.head')

</head>

<body>
    <div id="wrapper">

        <!-- sidebar -->
        @include('backend.dashboard.component.sidebar')
        <!-- end sidebar -->

        <div id="page-wrapper" class="gray-bg">

            <!-- navbar -->
            @include('backend.dashboard.component.nav')
            <!-- end navbar -->

            <!-- include template dc gui thong qua compact -->
            @include($template)
            
            <!-- footer -->
            @include('backend.dashboard.component.footer')
            <!-- end footer -->
        </div>

    </div>

    <!-- script here -->
    @include('backend.dashboard.component.script')
</body>
</html>
