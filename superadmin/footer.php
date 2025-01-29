<style>
footer {
    color: #333;
    padding: 10px 20px;
    position: fixed;
    bottom: 0;
    width: 100%;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
}

.footer-content .version {
    font-size: 0.9rem;
    margin: 0 auto;
    position: relative;
}
</style>

<footer class="footer-content">
    <span>&copy; 2024 - Sistem Informasi Jajan - Version 2.4.0</span>
</footer>
<script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/DataTables/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#produk').DataTable({
                responsive: true,
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                pageLength: 10
            });
        });
    </script>
</body>
</html>
