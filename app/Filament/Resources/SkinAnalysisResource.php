<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkinAnalysisResource\Pages;
use App\Models\SkinAnalysis;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker; // Import DateTimePicker
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SkinAnalysisResource extends Resource
{
    protected static ?string $model = SkinAnalysis::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('user_id')
                    ->numeric()
                    ->required()
                    ->label('User ID'),
                TextInput::make('skin_type')
                    ->required()
                    ->label('Skin Type'),
                Textarea::make('skin_problems')
                    ->required()
                    ->label('Skin Problems')
                    ->hint('Enter each problem separated by a comma (e.g., acne, dry skin)'),
                DateTimePicker::make('analysis_date') // Use DateTimePicker here
                    ->required()
                    ->label('Analysis Date'),
                FileUpload::make('image_path')
                    ->image()
                    ->label('Analysis Image')
                    ->directory('skin-analysis-images'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                    ->label('User ID')
                    ->sortable(),
                TextColumn::make('skin_type')
                    ->label('Skin Type'),
                TextColumn::make('skin_problems')
                    ->label('Skin Problems'),
                TextColumn::make('analysis_date')
                    ->label('Analysis Date')
                    ->sortable(),
            ])
            ->filters([
                // Define filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            // Define any relationships if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSkinAnalyses::route('/'),
            'create' => Pages\CreateSkinAnalysis::route('/create'),
            'edit' => Pages\EditSkinAnalysis::route('/{record}/edit'),
        ];
    }
}
