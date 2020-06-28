<?php
  include 'DB.php';
  include 'UserException.php';
  class User2{
   
    public $name='';
    public $db;

    public function __construct($name){
      $this->name=$name;
      $this->db=new DB();
    }

    public function signup(){    //注册
  
    
        try{
              $this->db->connect();

              $this->validateName();
      }catch(DbException $e){

        echo $e->getMessage(),',请与网站管理员联系','<br/>';
        echo $e->getFile(),'<br/>';
        echo $e->getline(),'<br/>';
      }catch(UserException $e){
        echo $e->getMessage(),',请检查用户名','<br/>';
        echo $e->getFile(),'<br/>';
        echo $e->getline(),'<br/>';
      }finally{
       
        exit;
      }

    }
    public function validateName(){
          if(strlen($this->name) >12){
             throw new UserException('用户名太长');

          }else if(strlen($this->name) <3){
            throw new UserException('用户名太短');

         }

          $exists= $this->db->findUser($this->name);
         if($exists){
           echo '验证用户名成功','<br/>';
         }else{
          echo '验证用户名失败','<br/>';
         }

          
    } 

  }