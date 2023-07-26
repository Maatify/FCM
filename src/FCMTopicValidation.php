<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2023-07-27
 * Time: 12:07 AM
 * https://www.Maatify.dev
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