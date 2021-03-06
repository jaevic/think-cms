<?php
namespace core\manage\model;

use core\Model;

class UserModel extends Model
{

    /**
     * 去前缀表名
     *
     * @var unknown
     */
    protected $name = 'manage_user';

    /**
     * 自动写入时间戳
     *
     * @var unknown
     */
    protected $autoWriteTimestamp = true;

    /**
     * 获取用户列表
     *
     * @return array
     */
    public function getUserList()
    {
        $list = $this->select();
        $users = [];
        foreach ($list as $vo) {
            $users[$vo['id']] = [
                'name' => $vo['user_name'] . '(' . $vo['user_nick'] . ')',
                'value' => $vo['id']
            ];
        }
        return $users;
    }

    /**
     * 获取状态列表
     *
     * @return array
     */
    public function getStatusList()
    {
        return [
            [
                'name' => '启用',
                'value' => 1
            ],
            [
                'name' => '禁用',
                'value' => 0
            ]
        ];
    }

}