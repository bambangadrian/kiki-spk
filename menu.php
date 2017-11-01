<div class="container">
    <div class="abs-block navigation clearfix">
        <div class="block logo">DSS System</div>
        <ul class="block nav">
            <li>
                <span>Master Data</span>
                <ul>
                    <li><a href="<?php echo HOST; ?>/page/criteria">Data Kriteria</a></li>
                    <li><a>Fuzzy Setup</a>
                        <ul>
                            <li><a href="<?php echo HOST; ?>/page/fuzzy_range">Range Type</a></li>
                            <li><a href="<?php echo HOST; ?>/page/criteria_fuzzy">Criteria - Fuzzy SAW</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo HOST; ?>/page/warga/">Manage Society</a></li>
                </ul>
            </li>
            <li>
                <span>DSS Portal</span>
                <ul>
                    <li><a>Setup New Selection</a></li>
                    <li><a>Participant</a>
                        <ul>
                            <li><a>Criteria Fields</a></li>
                            <li><a>Field Map</a></li>
                            <li><a>Society as Participant</a></li>
                        </ul>
                    </li>
                    <li><a>DSS List</a></li>
                    <li><a>Report</a></li>
                </ul>
            </li>
            <li><span>User</span>
                <ul>
                    <li><a href="<?php echo HOST; ?>/page/role">Role</a></li>
                    <li><a href="<?php echo HOST; ?>/page/user">User</a></li>
                    <li><a href="<?php echo HOST; ?>/page/user_role">Privileges (User-Role)</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav float-right">
            <li><span><?php echo $_SESSION['username']; ?></span>
                <ul class="right">
                    <li><a href="<?php echo HOST; ?>/page/profile">Profile</a></li>
                    <li><a href="<?php echo HOST; ?>/page/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>