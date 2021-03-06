<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace finLaravel\Services;

use finLaravel\Repositories\UserRepository;
use finLaravel\Validators\UserValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Hash;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;

/**
 * Description of ClientService
 *
 * @author proativos
 */
class UserService {

    private $repository;
    private $validator;
    private $filesystem;
    private $storage;

    public function __construct(UserRepository $repository, UserValidator $validator, Filesystem $filesystem, Storage $storage) {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
    }

    public function create(array $data) {

        try {
            $this->validator->with($data)->passesOrFail();
            $data['senha'] = Hash::make($data['senha']);
            return $this->repository->create($data);
        } catch (ValidatorException $ex) {
            return [
                'error' => true,
                'message' => $ex->getMessageBag()
            ];
        }
    }

    public function update(array $data, $id) {

        try {
            $this->validator->with($data)->passesOrFail();
            $data['senha'] = Hash::make($data['senha']);
            return $this->repository->update($data, $id);
        } catch (ValidatorException $ex) {
            return [
                'error' => true,
                'message' => $ex->getMessageBag()
            ];
        }
    }

    public function createFile($data) {

        try {
            $this->storage->put($data['name'] . '.' . $data['extension'], $this->filesystem->get($data['arquivo']));
            return true;
        } catch (ValidatorException $ex) {
            return [
                'error' => true,
                'message' => $ex->getMessageBag()
            ];
        }
    }

}
