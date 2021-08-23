<?php

namespace Framework\Session;

class Session
{

    /**
     * Starts a session.
     * @return bool
     */
    public function start(): bool
    {
        $result = false;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $result = true;
        }
        return $result;
    }

    /**
     * Destroys the session.
     * @return void
     */
    public function destroy(): void
    {
        session_unset();
        $_SESSION = [];
        session_destroy();
    }

    /**
     * Set key/value in session.
     *
     * @param mixed $key
     * @param mixed $value
     * @return void
     */

    public function set($key, $value, $array = '', $push = false): void
    {
        if ($array === '') {
            if ($push) {
                $_SESSION[$key][] = $value;
            } else {
                $_SESSION[$key] = $value;
            }
        } else {
            if ($push) {
                $_SESSION[$array][$key][] = $value;
            } else {
                $_SESSION[$array][$key] = $value;
            }
        }
    }

    /**
     * Gets the value stored in the session by key.
     *
     * @param mixed $key
     */
    public function get($key, $array = '')
    {
        if ($array === '') {
            $result = $_SESSION[$key] ?? null;
        } else {
            $result = $_SESSION[$array][$key] ?? null;
        }
        return $result;
    }


    /**
     * Checks the value stored in the session by key.
     *
     * @param mixed $key
     * @return bool
     */
    public function contains($key, $array = ''): bool
    {
        $result = false;
        if ($array === '') {
            if (isset($_SESSION[$key])) {
                $result = true;
            }
        } else {
            if (isset($_SESSION[$array][$key])) {
                $result = true;
            }
        }
        return $result;
    }

    /**
     * Removes the value stored in the session by key.
     *
     * @param mixed $key
     * @return void
     */

    public function delete($key, $array = ''): void
    {
        if ($array === '') {
            unset($_SESSION[$key]);
        } else {
            unset($_SESSION[$array][$key]);
        }
    }

    /**
     * Sets the current session save path.
     *
     * @param mixed $savePath
     * @return void
     */
    public function setSavePath($savePath): void
    {
        session_save_path($savePath);
    }

    /**
     * Gets the path to save the current session.
     *
     * @return string
     */
    public function getSavePath(): string
    {
        return session_save_path();
    }

    /**
     * Sets the id for the current session.
     *
     * @param $id
     * @return void
     */
    public function setId($id): void
    {
        session_id($id);
    }

    /**
     * Gets the id for the current session.
     *
     * @return string
     */

    public function getId(): string
    {
        return session_id();
    }


    /**
     * Sets the name for the current session.
     *
     * @param $name
     * @return void
     */
    public function setName($name): void
    {
        session_name($name);
    }

    /**
     * Gets the name for the current session.
     *
     * @return string
     */

    public function getName(): string
    {
        return session_name();
    }

    /**
     * CChecks if there is a cookies.
     *
     * @return boolean
     */
    public function cookieExists(): bool
    {
        $result = true;
        if (empty($_COOKIE)) {
            $result = false;
        }
        return $result;
    }

    /**
     * Checks if there is a session.
     *
     * @return boolean
     */

    public function sessionExists(): bool
    {
        $result = true;
        if (empty($_SESSION)) {
            $result = false;
        }
        return $result;
    }
}
