<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),
                TextInput::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('image_url')
                    ->label('Image')
                    ->image()
                    ->directory('projects')
                    ->visibility('public')
                    ->imageEditor(2)
                    ->required(),
                TextInput::make('demo_url')
                    ->label('Demo URL')
                    ->required()
                    ->maxLength(255),
                TextInput::make('repository_url')
                    ->label('Repository URL')
                    ->maxLength(255),
                TagsInput::make('technologies')
                    ->label('Technologies')
                    ->placeholder('Type and press enter to add a tag')
                    ->suggestions([
                        'Frontend',
                        'Backend',
                        'React',
                        'TypeScript',
                        'MongoDB',
                        'Laravel',
                        'Tailwind',
                        'Node.js',
                    ])
                    ->required()
                    ->rules('array')

                    ->separator(', ')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\ImageColumn::make('image')

                    ->label('Image'),
                Tables\Columns\TextColumn::make('demo_url'),
                Tables\Columns\TextColumn::make('repository_url'),
                Tables\Columns\TextColumn::make('technologies'),
            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
