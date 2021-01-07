<?php


namespace App\Services;


use App\Repositories\UserRepository;

class CreateUserService
{
    /** @var UserRepository */
    private $userRepository;

    /**
     * CreateUserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create($email, $name, $password){
        return $this->userRepository->create([
            'name'          => $name,
            'email'         => $email,
            'password'      =>  bcrypt($password)
        ]);
    }
}
