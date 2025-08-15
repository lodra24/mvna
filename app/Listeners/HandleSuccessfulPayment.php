<?php

namespace App\Listeners;

use App\Models\TestResult;
use Illuminate\Support\Facades\Log;
use Laravel\Paddle\Events\TransactionCompleted;

class HandleSuccessfulPayment
{
    /**
     * Handle the event.
     */
    public function handle(TransactionCompleted $event): void
    {
        // 1. Log the incoming webhook to confirm it's being received.
        Log::info('TransactionCompleted webhook received. Starting to process...');

        // 2. Extract the payload and custom_data from the event.
        $payload = $event->payload;
        $customData = $payload['data']['custom_data'] ?? null;

        // 3. Log the custom_data to see what we received from Paddle.
        Log::info('Webhook payload custom_data:', ['customData' => $customData]);

        // 4. Check if our 'test_result_id' exists in the custom_data.
        if (isset($customData['test_result_id'])) {
            $testResultId = $customData['test_result_id'];
            Log::info('test_result_id found in custom_data.', ['test_result_id' => $testResultId]);

            // 5. Find the corresponding TestResult in the database.
            $testResult = TestResult::find($testResultId);

            if ($testResult) {
                // 6. If the TestResult is found, log its current status.
                Log::info('TestResult found in database.', ['id' => $testResult->id, 'current_status' => $testResult->status]);
                
                // 7. Update the status only if it's not already completed.
                if ($testResult->status !== 'completed') {
                    $testResult->update(['status' => 'completed']);
                    Log::info('SUCCESS: TestResult status updated to completed.', ['test_result_id' => $testResultId]);
                } else {
                    Log::warning('TestResult status is already completed. No update needed.', ['test_result_id' => $testResultId]);
                }
            } else {
                // 8. If no TestResult is found for the ID, log an error.
                Log::error('ERROR: TestResult not found in database for the given ID.', ['test_result_id' => $testResultId]);
            }
        } else {
            // 9. If 'test_result_id' is not in the custom_data, log a warning.
            Log::warning('WARNING: test_result_id not found in webhook custom_data. Cannot update TestResult.');
        }
    }
}
