<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
/**
* 常用PHP正则表达式
* @author lkxiaolou
*/

/**
*    int preg_match_all/
*    int preg_match(string $pattern, string subject, array &$matches, int $flags = 0, 
                    int $offset = 0)
*    @pattern 正则表达式
*    @subject 输入的字符串 
*    @matches 保存搜索结构
*    @flags 如果为1，表示对每个出现的匹配返回时会附加字符串偏移量
*    @offset 指定开始搜索的位置,默认为0
*    @return 返回匹配的次数
*/

//查看测试
function print_check_preg($reg, $str)
{
	$res = array();
	if($t = preg_match_all($reg, $str, $res)){
                  echo '匹配了', $t, '次<br>';
                  echo '匹配结果:<br>';
		  print_r($res);
                  echo '<br>';
          }else{  
                  echo '无匹配<br>';
          }
          echo '<br>';
          return $res;
}

//验证整数
//以1-9开头，之后为任意的数字
$reg1 = '/^[1-9]\d+$/';
//print_check_preg($reg1, "123");
//print_check_preg($reg1, "012");
//print_check_preg($reg1, "1i0");

//验证整数或者小数
//以0开头后接点，或者其他开头后接点或者数字，点只能出现一次
$reg2 = '/(^0\.\d+$)|([1-9]+\.\d+$)/';
//print_check_preg($reg2, '00.12');
//print_check_preg($reg2, '12.');
//print_check_preg($reg2, '0.001');
//print_check_preg($reg2, '0.83');
//print_check_preg($reg2, '1..0');

//验证用户名合法性-和变量命名原则相同
//不能以数字开头，可以使用字母，数字，下划线
$reg3 = '/^[\_a-zA-Z][a-zA-Z0-9]+$/';
//print_check_preg($reg3, '_lk');
//print_check_preg($reg3, '0lk');
//print_check_preg($reg3, 'lk00');

//验证密码复杂度
//当密码中全是字母或者全是数字或位数小于8的时候视为简单的密码
//to do
$reg4 = '/^$/';
//print_check_preg($reg4, '123456');
//print_check_preg($reg4, '123abcaa');
//print_check_preg($reg4, '123abcA');
//print_check_preg($reg4, '1234abcA.');

//验证邮箱
//形如xx@XX.XX，@后面无下划线
$reg5 = '/^[0-9a-zA-Z_]+\@[0-9a-zA-Z]+\.[0-9a-zA-Z]+$/';
//print_check_preg($reg5, 'lk@.com');
//print_check_preg($reg5, 'lk.com');
//print_check_preg($reg5, 'lk_@163');
//print_check_preg($reg5, 'lk@163.com');

//验证手机号码
//11位，开头为13X,14X,15X,18X,17X
$reg6 = '/^1[34578][0-9]{9}/';
//print_check_preg($reg6, '1571100000');
//print_check_preg($reg6, '12312341234');
//print_check_preg($reg6, '17712341234');

//验证电话号码
//形如6821731,87953052,0563-6095509,05636095509,0572-87953069,057287953069,010-67876712,0106712346
$reg7 = '/(^\d{3,4}-\d{7,8}$)|(^\d{3,4}\d{7,8}$)|(^\d{7,8}$)/';
//print_check_preg($reg7, '6821731');
//print_check_preg($reg7, '87953052');
//print_check_preg($reg7, '0563-6095509');
//print_check_preg($reg7, '057287953069');
//print_check_preg($reg7, '0106712346');
//print_check_preg($reg7, '010-671234609');

//验证邮编
//简单点就是6位纯数字
$reg8 = '/^[\d]{6}$/';
//print_check_preg($reg8, '242200');
//print_check_preg($reg8, '2411000');

//验证url
//形如www.newboo.org或者http://www.newboo.org/index/index.html?force=1
//不能有空格
$reg9 = '/^(http[s]?\:\/\/)?[a-zA-Z\d]+\.[a-zA-Z\d]+\.[^\s]+$/';
//print_check_preg($reg9, 'www.baidu.com');
//print_check_preg($reg9, 'http://www.baidu.com/s?ie=utf-8&f=8&rsv_bp=1');
//print_check_preg($reg9, 'https://www.baidu.com/s?ie=utf-8&f=8&rsv_bp=1');

//验证汉字
$reg10 = '/^[\x{4e00}-\x{9fa5}]+$/u';
//print_check_preg($reg10, '哈哈1');
//print_check_preg($reg10, '哈哈aa');
//print_check_preg($reg10, '呵呵');

//验证IP地址
//0.0.0.0~255.255.255.255
//to do 数值范围没限制
$reg11 = '/^(\d{1,3}\.){3}\d{1,3}$/';
//print_check_preg($reg11, '0.0.0.0');
//print_check_preg($reg11, '192.168.255.101');

//匹配img标签
$reg12 = '/<img\s[^\>]*\>/';
print_check_preg($reg12, file_get_contents('http://www.hao123.com'));

?>
