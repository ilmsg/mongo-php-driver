--TEST--
Test for PHP-270: ext/mongo classes should return meaningful results from Reflection API
--FILE--
<?php
$classes = array(
    'Mongo',
    'MongoDB',
    'MongoCollection',
    'MongoCursor',
    'MongoPool',
);
foreach ($classes as $class) {
	echo $class, "\n";
    $r = new ReflectionClass($class);
    $methods = $r->getMethods();

	foreach ($methods as $m) {
	    echo "  Method ", $m->getName(), " expects ", $m->getNumberOfParameters(), " parameters\n";
	    foreach ($m->getParameters() as $p) {
	        echo '    ', $p->getPosition() , ': ' , $p->getName() , ($p->isOptional() ? ' (optional)' : ''), "\n";
	    }
	}
	echo "\n";
}
?>
--EXPECT--
