<?php

/**
 * @copyright   ©2023 Maatify.dev
 * @Liberary    Logger
 * @Project     Logger
 * @author      Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since       2023-07-25 3:48 PM
 * @see         https://www.maatify.dev Maatify.com
 * @link        https://github.com/Maatify/FCM  view project on GitHub
 * @link        https://github.com/Maatify/Logger/ (maatify/logger),
 * @link        https://github.com/kreait/firebase-php/ (kreait/firebase-php),
 * @copyright   ©2023 Maatify.dev
 * @note        This Project using for Google Firebase Cloud Message.
 * @note        This Project extends other libraries kreait/firebase-php, maatify/logger
 *
 * @note        This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

namespace Maatify\FCM;


class FcmHandler
{
    /**
     * @link        https://firebase-php.readthedocs.io/en/stable/cloud-messaging.html  view docs
     */
    /**
     * @var array|string[]
     */
    private array $notification = [];
    private array $data = [];

    private string $firebase_credentials_json;
    public FcmSender $sender;

    public function __construct(string $firebase_credentials_json)
    {
        $this->firebase_credentials_json = $firebase_credentials_json;
    }

    public function SetNotification(string $title, string $body, string $imageUrl = ''): static
    {
        $this->notification = [
            'title' => $title,
            'body' => $body,
            'image' => $imageUrl,
        ];
        $this->sender = new FcmSender($this->firebase_credentials_json, $this->notification, $this->data);
        return $this;
    }


    public function SetDate(array $data): static
    {
        $this->data = $data;
        $this->sender = new FcmSender($this->firebase_credentials_json, $this->notification, $this->data);
        return $this;
    }

    public function Sender(): FcmSender
    {
        return $this->sender;
    }



}