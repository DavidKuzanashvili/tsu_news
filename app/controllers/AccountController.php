<?php


class AccountController
{
    // GET
    public function login()
    {
        return view('account/login');
    }

    // POST
    public function signIn()
    {
        try {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (isset($email) && isset($password)) {
                $user = App::get('database')->firstOrDefault('users', "email='{$email}'", 'User');
                $verified = password_verify($password, $user->passwordHash);
                if ($verified) {
                    $authService = new AuthService;
                    $authService->persistCredentials($email, $user->role);

                    redirect('');
                }

                $data  = [
                  'email' => $email,
                  'password' => $password
                ];

                return view('account/login', compact('data'));
            }
            return redirect('error');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function logOut()
    {
        if (isset($_COOKIE['identity'])) {
            unset($_COOKIE['identity']);
            setcookie('identity', null, -1, '/');
        }

        if (isset($_COOKIE['userRole'])) {
            unset($_COOKIE['userRole']);
            setcookie('userRole', null, -1, '/');
        }

        redirect('');
    }

    // GET
    public function registration()
    {
        return view('account/registration');
    }

    // POST
    public function createUser()
    {
        try {
            $activationCode = md5(rand());
            $user = [
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'userName' => $_POST['email'],
                'role' => $_POST['role'],
                'email' => $_POST['email'],
                'phoneNumber' => $_POST['phoneNumber'],
                'emailConfirmed' => 0,
                'userActivationCode' => $activationCode,
                'passwordHash' => password_hash($_POST['password'], PASSWORD_BCRYPT)
            ];

            App::get('database')->add('users', $user);

            // Send mail
            $mailService = new EmailService('127.0.0.1', 25);

            $result = $mailService->send
            (
                $_POST['email'],
                'http://localhost:8080',
                $_POST['firstName'],
                $_POST['password'],
                $activationCode
            );

            if ($result) {
                $user = App::get('database')->firstOrDefault('users', "email='{$user['email']}'", 'User');
                $privateInfo = [
                    'userId' => $user->id,
                    'privateNumber' => $_POST['privateNumber'],
                    'address' => $_POST['address']
                ];

                App::get('database')->add('user_private_info', $privateInfo);

                redirect('login');
            }

            return redirect('error');
        } catch (PDOException $e) {
            dd($e->getMessage());
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function verifyEmail()
    {
        try {
            $activationCode = $_GET['activationCode'];

            if (isset($activationCode)) {
                $user = App::get('database')->firstOrDefault('users', "userActivationCode='{$activationCode}'", 'User');

                if (!$user->emailConfirmed) {
                    App::get('database')->update('users', [
                        'emailConfirmed' => true
                    ], "userActivationCode='{$activationCode}'");
                }

                return redirect('email-verified');
            } else {
                return redirect('error');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function emailVerified()
    {
        return view('account/verification-message');
    }
}