<?php

namespace App\Policies;

use App\Models\TestResult;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TestResultPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Kullanıcı kendi test sonuçlarını görebilir
    }

    /**
     * Determine whether the user can view the test result.
     * Temel sahiplik kontrolü - tüm metodlar için kullanılabilir
     */
    public function view(User $user, TestResult $testResult): bool
    {
        return $user->id === $testResult->user_id;
    }

    /**
     * Determine whether the user can access the payment page for the test result.
     */
    public function accessPayment(User $user, TestResult $testResult): bool
    {
        return $user->id === $testResult->user_id;
    }

    /**
     * Determine whether the user can view the completed test result.
     */
    public function viewResult(User $user, TestResult $testResult): bool
    {
        return $user->id === $testResult->user_id && $testResult->status === 'completed';
    }

    /**
     * Determine whether the user can download the report.
     * Raporu indirebilmesi için hem sahibi olmalı hem de test tamamlanmış olmalı
     */
    public function download(User $user, TestResult $testResult): bool
    {
        return $user->id === $testResult->user_id && $testResult->status === 'completed';
    }

    /**
     * Determine whether the user can process payment for the test result.
     */
    public function processPayment(User $user, TestResult $testResult): bool
    {
        return $user->id === $testResult->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Herhangi bir giriş yapmış kullanıcı test oluşturabilir
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TestResult $testResult): bool
    {
        return $user->id === $testResult->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TestResult $testResult): bool
    {
        return $user->id === $testResult->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TestResult $testResult): bool
    {
        return $user->id === $testResult->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TestResult $testResult): bool
    {
        return $user->id === $testResult->user_id;
    }
}
