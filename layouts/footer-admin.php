</div>
    </div>

    <script src="../assets/libraries/jquery/jquery.slim.min.js "></script>
    <script src="../assets/libraries/bootstrap/js/bootstrap.bundle.min.js "></script>
    <script src="../assets/libraries/bootstrap/js/sweetalert.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js "></script>
    <script>
      AOS.init();
    </script>
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
  </body>
</html>