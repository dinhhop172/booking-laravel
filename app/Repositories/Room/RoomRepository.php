<?php
namespace App\Repositories\Room;

use App\Repositories\BaseRepository;
use App\Repositories\Room\RoomRepositoryInterface;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Room::class;
    }

    public function getRoom()
    {
        return $this->model->get();
    }

    public function createRoom(array $data)
    {
        return $this->model->create($data);
    }

    public function updateRoom($id, array $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function editRoom($id)
    {
        return $this->model->find($id);
    }

    public function deleteRoom($id)
    {
        $result = $this->find($id);
        return $result->delete();
    }
}
