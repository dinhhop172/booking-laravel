<?php
namespace App\Repositories\Room;

use App\Repositories\RepositoryInterface;

interface RoomRepositoryInterface extends RepositoryInterface
{
    public function getRoom();
    public function editRoom($id);
    public function createRoom(array $data);
    public function updateRoom($id, array $data);
    public function deleteRoom($id);
}
