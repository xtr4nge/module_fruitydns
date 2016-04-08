<?
$mod_name="fruitydns";
$mod_version="1.0";
$mod_path="/usr/share/fruitywifi/www/modules/$mod_name";
$mod_logs="$log_path/$mod_name.log"; 
$mod_logs_history="$mod_path/includes/logs/";
$mod_panel="show";
$mod_type="service";
$mod_isup="ps aux|grep -E 'dnschef.py' | grep -v grep | awk '{print $2}'";
$mod_alias="FruityDNS";
$mod_dnsspoof="1";

# EXEC
$bin_dnschef = "$mod_path/includes/dnschef";
$bin_python = "/usr/bin/python";
$bin_rm = "/bin/rm";
$bin_echo = "/bin/echo";
$bin_touch = "/bin/touch";
$bin_mv = "/bin/mv";
$bin_sed = "/bin/sed";
$bin_dos2unix = "/usr/bin/dos2unix";
//$bin_iptables = "/sbin/iptables";
$bin_killall = "/usr/bin/killall";
//$bin_cp = "/bin/cp";
?>
