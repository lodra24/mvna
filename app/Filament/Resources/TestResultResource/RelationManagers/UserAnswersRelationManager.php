<?php

namespace App\Filament\Resources\TestResultResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserAnswersRelationManager extends RelationManager
{
    protected static string $relationship = 'userAnswers';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('question.question_text')
            ->columns([
                Tables\Columns\TextColumn::make('question.question_text')
                    ->label('Soru Metni')
                    ->limit(100)
                    ->wrap(),
                Tables\Columns\TextColumn::make('chosen_option')
                    ->label('Seçilen Cevap')
                    ->badge(),
            ])
            ->filters([
                //
            ]);
    }
}
