<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2023-07-27
 * Time: 12:07 AM
 * https://www.Maatify.dev
 */
/**
 * @copyright   ©2023 Maatify.dev
 * @Liberary    Logger
 * @Project     Logger
 * @author      Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since       2023-07-27 12:07 AM
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
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Exception\MessagingException;

class FCMTopicValidation
{
    private Messaging $messaging;

    public function __construct(Messaging $messaging)
    {
        $this->messaging = $messaging;
    }

    /**
     * @throws MessagingException
     * @throws FirebaseException
     */
    public function ValidateRegistrationTokens(array $tokens): array
    {
        return $this->messaging->validateRegistrationTokens($tokens);
    }
}