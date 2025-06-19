<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Pages;
use App\Models\Question;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Tabs;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationLabel = 'Sorular';

    protected static ?string $modelLabel = 'Soru';

    protected static ?string $pluralModelLabel = 'Sorular';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Translations')
                    ->tabs([
                        Tabs\Tab::make('English')
                            ->schema([
                                Forms\Components\Textarea::make('question_text.en')
                                    ->label('Question Text (EN)')
                                    ->required(),
                                Forms\Components\Textarea::make('option_a_text.en')
                                    ->label('Option A Text (EN)')
                                    ->required(),
                                Forms\Components\Textarea::make('option_b_text.en')
                                    ->label('Option B Text (EN)')
                                    ->required(),
                            ]),
                        Tabs\Tab::make('Türkçe')
                            ->schema([
                                Forms\Components\Textarea::make('question_text.tr')
                                    ->label('Soru Metni (TR)')
                                    ->required(),
                                Forms\Components\Textarea::make('option_a_text.tr')
                                    ->label('Seçenek A Metni (TR)')
                                    ->required(),
                                Forms\Components\Textarea::make('option_b_text.tr')
                                    ->label('Seçenek B Metni (TR)')
                                    ->required(),
                            ]),
                    ])
                    ->columnSpanFull()
                    ->activeTab(1),

                // Diğer alanlar sekmelerin dışında kalacak
                Forms\Components\Select::make('dimension')
                    ->label('Boyut (Dimension)')
                    ->options([
                        'E/I' => 'Extraversion - Introversion (E-I)',
                        'S/N' => 'Sensing - Intuition (S-N)',
                        'T/F' => 'Thinking - Feeling (T-F)',
                        'J/P' => 'Judging - Perceiving (J-P)',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('option_a_value')
                    ->label('Seçenek A Değeri (örn: E)')
                    ->required()
                    ->maxLength(1),
                Forms\Components\TextInput::make('option_b_value')
                    ->label('Seçenek B Değeri (örn: I)')
                    ->required()
                    ->maxLength(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('question_text')
                    ->label('Soru Metni')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('option_a_text')
                    ->label('Seçenek A Metni')
                    ->limit(30)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('option_b_text')
                    ->label('Seçenek B Metni')
                    ->limit(30)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('dimension')
                    ->label('Boyut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'E/I' => 'info',
                        'S/N' => 'success',
                        'T/F' => 'warning',
                        'J/P' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('option_a_value')
                    ->label('Seçenek A Değeri')
                    ->sortable(),
                Tables\Columns\TextColumn::make('option_b_value')
                    ->label('Seçenek B Değeri')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Oluşturulma Tarihi')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Güncellenme Tarihi')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('dimension')
                    ->label('Boyut')
                    ->options([
                        'E/I' => 'Extraversion - Introversion (E-I)',
                        'S/N' => 'Sensing - Intuition (S-N)',
                        'T/F' => 'Thinking - Feeling (T-F)',
                        'J/P' => 'Judging - Perceiving (J-P)',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'view' => Pages\ViewQuestion::route('/{record}'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}