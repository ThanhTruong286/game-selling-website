<!DOCTYPE html>
<html>
<head>

    @include('backend.library.component.head')

</head>

<body>
    <div id="wrapper">

        <!-- sidebar -->
        @include('backend.library.component.sidebar')
        <!-- end sidebar -->

        <div id="page-wrapper" class="gray-bg">

            <!-- navbar -->
            @include('backend.library.component.nav')
            <!-- end navbar -->

            @include('backend.library.component.table')
            
            <!-- footer -->
            @include('backend.library.component.footer')
            <!-- end footer -->
        </div>

    </div>

    <!-- script here -->
    @include('backend.library.component.script')
</body>
</html>
