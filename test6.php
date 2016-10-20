class haha
{
  var $apple="apple";
  var $banana="banana";
}
$haha1=new haha();
$haha2=new haha();
$arrayobj = new ArrayObject();
$arrayobj->append($haha1);
$arrayobj->append($haha2);
echo $arrayobj[0]->apple.$arrayobj[1]->banana.'<br>';