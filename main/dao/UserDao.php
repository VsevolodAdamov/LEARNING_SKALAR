<?php

namespace main\dao;

interface UserDao extends EntityDao {
   
   public function getByDatebirthToday();
   
   public function getByLoginAndPassword($login, $password);
   
}
