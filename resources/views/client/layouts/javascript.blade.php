<!-- Các script khác được tải trước jqBootstrapValidation.min.js -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('client/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('client/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="{{ asset('client/mail/contact.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js" 
integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ==" 
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('client/js/main.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="{{ asset('admin/assets/base/base.js') }}"></script>

<!-- jqBootstrapValidation.min.js được tải sau các script khác -->


@yield('script')
