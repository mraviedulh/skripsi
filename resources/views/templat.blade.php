@include('components.header')

<!-- sidenav  -->
@include('components.sidenav')
<!-- end sidenav -->

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    <!-- Navbar -->
    @include('components.navbar')
    <!-- end Navbar -->

    <!-- cards -->
    <div class="w-full px-6 py-6 mx-auto">
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
            <!-- ... (card content) ... -->
        </div>

        <!-- cards row 2 -->
        <div class="flex flex-wrap mt-6 -mx-3">
            <!-- ... (card content) ... -->
        </div>

        <!-- cards row 3 -->
        <div class="flex flex-wrap mt-6 -mx-3">
            <!-- ... (card content) ... -->
        </div>

        @include('components.footer')
    </div>
    <!-- end cards -->
</main>

@include('components.settings-button')

<!-- plugin for charts  -->
<script src="./assets/js/plugins/chartjs.min.js" async></script>
<!-- plugin for scrollbar  -->
<script src="./assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="./assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

</body>

</html>