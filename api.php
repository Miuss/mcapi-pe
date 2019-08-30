<?php
/*

	 * MCPEServerPingAPI written by GenesisMiuss

	 * Version: 1.0.0

	 * Website: https://miuss.org

	 * GitHub: https://github.com/miuss/mcapi-pe

*/

header('Content-type:text/json');

$host = $_GET['ip'];
$port = $_GET['port'];

require_once 'ApiQuery.php';

$json = array(
    'status' => 'success',
    'online' => false,
    'host' => array(
        'ip' => $host,
        'port' => $port
    ),
    'motd' => null,
    'version' => array(
        'version' => null,
        'software' => null,
        'plugins' => null
    ),
    'players' => array(
        'max' => 0,
        'now' => 0,
    )
);

if ($Info = $Query->GetInfo()) {
    if($Info['GameName']=='MINECRAFTPE'){
        $json = array(
            'status' => 'success',
            'online' => true,
                
            'host' => array(
                'ip' => $host,
                'port' => $port
            ),

            'motd' => $Info['HostName'],

            'version' => array(
                'version' => $Info['Version'],
                'software' => $Info['Software'],
                'plugins' => $Info['Plugins']
            ),

            'players' => array(
                'max' => $Info['MaxPlayers'],
                'now' => $Info['Players']
            )
        );
    }
}

echo json_encode($json, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
?>