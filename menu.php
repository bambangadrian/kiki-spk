<div class="container">
    <div class="abs-block navigation clearfix">
        <div class="block logo">DSS System</div>
        <ul class="block nav">
            <li>
                <span>Master Data</span>
                <ul>
                    <!--<li><a>Data Criteria</a>-->
                    <li><a href="<?php echo HOST; ?>/page/criteria/sub_criteria">Kriteria</a></li>
                    <!--<ul>-->
                    <!--    <li><a href="-->
                    <?php //echo HOST; ?><!--/page/criteria/criteria">Primary Kriteria</a></li>-->
                    <!--    <li><a href="-->
                    <?php //echo HOST; ?><!--/page/criteria/sub_criteria">Sub Kriteria</a></li>-->
                    <!--</ul>-->
                    <!--</li>-->
                    <!--<li><a>Fuzzy Setup</a>-->
                    <!--<ul>-->
                    <li><a href="<?php echo HOST; ?>/page/fuzzy/range_type">Bobot</a></li>
                    <!--<li><a href="-->
                    <?php //echo HOST; ?><!--/page/fuzzy/criteria_fuzzy">Criteria - Fuzzy SAW</a></li>-->
                    <!--</ul>-->
                    <!--</li>-->
                    <li><a href="<?php echo HOST; ?>/page/warga/">Data Warga</a></li>
                </ul>
            </li>
            <li>
                <span>DSS Portal</span>
                <ul>
                    <li><a href="<?php echo HOST; ?>/page/dss">Dss Seleksi</a></li>
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