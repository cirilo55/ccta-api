<?php
namespace App\Repositories;

?>
<?php
use Illuminate\Http\Request;
use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getRules($id = null)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ];

        if ($id) {
            $rules['email'] = 'required|email|unique:users,email,' . $id;
        }

        return $rules;
    }

}
