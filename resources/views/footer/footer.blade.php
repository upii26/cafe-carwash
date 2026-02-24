
    <script>
        /* ═══════════════════════════════════════
                   SIDEBAR OPEN / CLOSE
                ═══════════════════════════════════════ */
        function openSidebar() {
            document.getElementById('sidebar').classList.add('open');
            document.getElementById('sidebarOverlay').classList.add('open');
        }

        function closeSidebar() {
            document.getElementById('sidebar').classList.remove('open');
            document.getElementById('sidebarOverlay').classList.remove('open');
        }

        /* ═══════════════════════════════════════
           RIGHT PANEL OPEN / CLOSE
        ═══════════════════════════════════════ */
        function openPanel() {
            // Only slide up on non-desktop
            if (window.innerWidth >= 1024) return;
            document.getElementById('rightPanel').classList.add('open');
            document.getElementById('panelOverlay').classList.add('open');
        }

        function closePanel() {
            if (window.innerWidth >= 1024) return;
            document.getElementById('rightPanel').classList.remove('open');
            document.getElementById('panelOverlay').classList.remove('open');
        }
    </script>

</body>
</html>
