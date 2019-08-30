<?php	
	
	require __DIR__ . '/src/MinecraftQuery.php';
	require __DIR__ . '/src/MinecraftQueryException.php';
	
	use xPaw\MinecraftQuery;
	use xPaw\MinecraftQueryException;

	define('MQ_SERVER_ADDR', $host);
	define('MQ_SERVER_PORT', $port);
	
	$Query = new MinecraftQuery( );
	
	try
	{
		$Query->Connect( MQ_SERVER_ADDR, MQ_SERVER_PORT,1);
	}catch( MinecraftQueryException $e )
	{
		$Exception = $e;
	}
?>