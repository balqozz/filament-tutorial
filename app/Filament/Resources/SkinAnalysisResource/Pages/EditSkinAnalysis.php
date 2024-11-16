<?php

namespace App\Filament\Resources\SkinAnalysisResource\Pages;

use App\Filament\Resources\SkinAnalysisResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSkinAnalysis extends EditRecord
{
    protected static string $resource = SkinAnalysisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
