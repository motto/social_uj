<?php
class Ikonsor
{   public $icondir='res/ico/32/';
    public $mezok=array('uj','szerk','pub','unpub','torol','email');
    public $param=array('szerk'=>'edit.png','uj'=>'plusz.png','torol'=>'torol.png','pub'=>'published.png','unpub'=>'unpublished.png','email'=>'email.png');
    public $cont='<script LANGUAGE="JavaScript">
function confirmSubmit()
{
var agree=confirm("FIGYELEM! Az ok gombra kattintva az elem végérvényesen törlődik!");
if (agree)
    return true ;
else
    return false ;
}
</script>  <form method="post">
    <div style="width: 100%;position: fixed;top: 15%;" draggable="true">
    <div style="float: right; margin-right: 10%;">';

    public $cont_bezar='</div><div style="clear: both;" ></div>
    </div>
        <div style="margin-top:70px;">
            <!--|hiba|-->
            <!--|tartalom|-->
            <!--|tabla|-->
            <!--|tartalom2|-->
        </div>
       <!--|hidden|-->
    </form>';


    public function result()
    {
        $oncl='onclick="return confirmSubmit()"';
        $res=$this->cont;
        foreach ($this->mezok as $mezo ) {
            if($mezo=='torol'){ $oncl='onclick="return confirmSubmit()"';}
            else{$oncl='';}
            $res=$res.'<button class="btkep" type="submit" name="task"  value="'.$mezo.'" '.$oncl.'><img src="'.$this->icondir.$this->param[$mezo].'"/></br><!--#'.$mezo.'--></button>';
        }

        $res=$res.$this->cont_bezar;
        return $res;
    }
}

