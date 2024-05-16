<!DOCTYPE html>
<html>
<head>

    @include('backend.user.component.head')

</head>

<body>
    <div id="wrapper">

        <!-- sidebar -->
        @include('backend.user.component.sidebar')
        <!-- end sidebar -->

        <div id="page-wrapper" class="gray-bg">

            <!-- navbar -->
            @include('backend.user.component.nav')
            <!-- end navbar -->

            <!-- include template dc gui thong qua compact -->
            @include($template)
            
            <!-- footer -->
            @include('backend.user.component.footer')
            <!-- end footer -->
        </div>

    </div>

    <!-- script here -->
    @include('backend.user.component.script')
</body>
</html>
