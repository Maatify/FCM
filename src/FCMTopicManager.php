<?php

/**
 * @copyright   ©2023 Maatify.dev
 * @Liberary    Logger
 * @Project     Logger
 * @author      Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since       2023-07-27 12:00 AM
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

use Kreait\Firebase\Contract\Messaging;

class FCMTopicManager
{
    private Messaging $messaging;

    public function __construct(Messaging $messaging)
    {
        $this->messaging = $messaging;
    }

    public function SubscribeToTopic(string $topic, string|array $registrationTokenOrTokens): array
    {
        return $this->messaging->subscribeToTopic($topic, $registrationTokenOrTokens);

    }

    public function SubscribeToTopics(iterable $topics, $registrationTokenOrTokens): array
    {
        return $this->messaging->subscribeToTopics($topics, $registrationTokenOrTokens);
    }

    public function UnsubscribeFromTopic($topic, $registrationTokenOrTokens): array
    {
        return $this->messaging->unsubscribeFromTopic($topic, $registrationTokenOrTokens);
    }

    public function UnsubscribeFromTopics($topics, $registrationTokenOrTokens): array
    {
        return $this->messaging->unsubscribeFromTopics($topics, $registrationTokenOrTokens);
    }

    public function unsubscribeFromAllTopics($registrationTokenOrTokens): array
    {
        return $this->messaging->unsubscribeFromAllTopics($registrationTokenOrTokens);
    }
}