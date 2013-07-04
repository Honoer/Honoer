<?php
/**   
 * PHP二分算法查找示例及详细分析 
 * @param array $array 要查找的数组    
* @param int $min_key 数组的最小下标    
* @param int $max_key 数组的最大下标    
* @param mixed $value 要查找的值    
* @return boolean    
 */   
 function bin_search($array,$min_key,$max_key,$value){        
 if($min_key <= $max_key){    
	         $key = intval(($min_key+$max_key)/2);            
	 if($array[$key] == $value){                
		 return true;    
		         }elseif($value < $array[$key]){    
		             return bin_search($array,$min_key,$key-1,$value);    
		         }else{    
		           return bin_search($array,$key+1,$max_key,$value);            
		 }       
 }else{    
         return false;        
 }    

 }       
 //现在我们来测试一下这个函数    $array = array(1,22,23,45,58);    $value = 45;    
 $min_key = min(array_keys($array));    
 $max_key = max(array_keys($array));    
 if(bin_search($array,$min_key,$max_key,$value)){        
	 echo "Search Success!";    
 }else{    
     echo "Search Faliure!";    
 }   
  
 //这里涉及到了两个知识点:  首先是二分算法的概念:如下  
 //1、二分查找的先决条件:就是表中结点按关键字有序，且顺序(一维数组)存储.  2、二分法思想:取中,比较  
  //   (2.1)求有序表的中间位置mid  
   //  (2.2)若r[mid].key == k,则查找成功,若r[mid].key > k,在左子表中继续进行二分查找;若r[mid].key < k,则在右字表中继续进行二分查找  然后就是 递归

