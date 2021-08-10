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
        session_destroy();
        $_SESSION = [];
    }

    /**
     * Set key/value in session.
     *
     * @param mixed $key
     * @param mixed $value
     * @return void
     */
    public function set($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Gets the value stored in the session by key.
     *
     * @param mixed $key
     * @return string
     */
    public function get($key): string
    {
        return $_SESSION[$key];
    }


    /**
     * Checks the value stored in the session by key.
     *
     * @param mixed $key
     * @return bool
     */
    public function contains($key): bool
    {
        $result = false;
        if (isset($_SESSION[$key])) {
            $result = true;
        }
        return $result;
    }

    /**
     * Removes the value stored in the session by key.
     *
     * @param mixed $key
     * @return void
     */

    public function delete($key): void
    {
        unset($_SESSION[$key]);
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
