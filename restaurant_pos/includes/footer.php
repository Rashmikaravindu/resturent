</main> <!-- This closes the main tag opened in header.php -->
            </div> <!-- Close .row -->
        </div> <!-- Close .container-fluid.flex-grow-1 -->
        <footer class="site-footer mt-auto"> <!-- Added site-footer, mt-auto for sticky from d-flex wrapper -->
            <div class="container">
                <span class="text-muted">&copy; <?php echo date("Y"); ?> <?php echo defined('SITE_NAME') ? SITE_NAME : 'Restaurant POS'; ?>. All rights reserved.</span>
            </div>
        </footer>
    </div> <!-- Close .d-flex.flex-column.min-vh-100 -->

    <!-- jQuery -->
    <script src="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>assets/js/bootstrap.min.js"></script>
    <!-- Common JS -->
    <script src="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>assets/js/common.js"></script>
    <!-- Page-specific JS can be included here or in the page itself -->

</body>
</html>
