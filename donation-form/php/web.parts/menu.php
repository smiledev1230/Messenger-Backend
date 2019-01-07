<div class="menu" id="topmenu">
    <a href="index.php">Dashboard</a>
 
    <a href="donations.php" rel="Donations">Donations</a>
    <div id="Donations" class="dropdown">
        <a href="donations.php">View All</a>
        <a href="donations.php?status_id=completed&order_by=amount&order_direction=desc&per_page=10">Top Donors</a>
        <a href="donations.php?filter_by=today&order_by=amount&order_direction=desc&per_page=250">Today</a>
        <a href="donations.php?filter_by=this_month&order_by=amount&order_direction=desc&per_page=250">This Month</a>
        <a href="donations.php?filter_by=this_week&order_by=amount&order_direction=desc&per_page=250">This Week</a>
        <a href="donations.php?filter_by=this_year&order_by=amount&order_direction=desc&per_page=250">This Year</a>
        <a href="donations.php?filter_by=last_year&order_by=amount&order_direction=desc&per_page=250">Last Year</a>
    </div>
    
    <a title="Settings" class="cursor" onclick="return GB_showFullScreen('Settings', '../../../php/settings.php')">Settings</a>
    <a title="Settings" class="cursor" onclick="return GB_showFullScreen('Settings', '../../../php/change_password.php')">Change Password</a>
    <a href="logout.php">Logout</a>
           
</div>
<script type="text/javascript">
    cssdropdown.topmenu("topmenu");
</script>

