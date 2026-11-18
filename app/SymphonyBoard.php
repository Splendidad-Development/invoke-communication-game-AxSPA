<?php

namespace App;

use Illuminate\Support\Collection;

/**
 * Reads the symphony board definition from config/symphony.php and scores arrangements.
 *
 * @phpstan-type Section array{title: string, tone: string, slots: int, answers: list<int>}
 * @phpstan-type Column array{key: string, tone: string, title: string, description: ?string, rows: list<list<string>>}
 */
class SymphonyBoard
{
    /**
     * @param  array<string, Section>  $sections
     * @param  list<Column>  $columns
     * @param  array<int, array{persona: string, caption: list<array{text: string, bold?: bool}>, question: string}>  $groups
     */
    public function __construct(
        private array $sections,
        private array $columns,
        private array $groups,
        private int $imageCount,
        private string $imagesPath,
    ) {}

    public static function fromConfig(): self
    {
        return new self(
            sections: config('symphony.sections'),
            columns: config('symphony.columns'),
            groups: config('symphony.groups'),
            imageCount: config('symphony.image_count'),
            imagesPath: config('symphony.images_path'),
        );
    }

    /**
     * Every slot id in board (and playback) order, mapped to its section key.
     *
     * @return Collection<string, string>
     */
    public function slots(): Collection
    {
        $slots = [];

        foreach ($this->columns as $column) {
            foreach ($column['rows'] as $row) {
                foreach ($row as $sectionKey) {
                    for ($index = 0; $index < $this->sections[$sectionKey]['slots']; $index++) {
                        $slots["{$sectionKey}-{$index}"] = $sectionKey;
                    }
                }
            }
        }

        return collect($slots);
    }

    /**
     * @return list<string>
     */
    public function slotIds(): array
    {
        return $this->slots()->keys()->all();
    }

    /**
     * @return list<int>
     */
    public function imageIds(): array
    {
        return range(1, $this->imageCount);
    }

    /**
     * @return list<int>
     */
    public function groupNumbers(): array
    {
        return array_keys($this->groups);
    }

    /**
     * @return array{persona: string, question: string}
     */
    public function group(int $group): array
    {
        return [
            'persona' => $this->groups[$group]['persona'],
            'question' => $this->groups[$group]['question'],
        ];
    }

    /**
     * Every group with the caption shown under its card on the group picker.
     *
     * @return list<array{number: int, caption: list<array{text: string, bold: bool}>}>
     */
    public function groupCards(): array
    {
        return array_map(fn (int $group): array => [
            'number' => $group,
            'caption' => array_map(fn (array $part): array => [
                'text' => $part['text'],
                'bold' => $part['bold'] ?? false,
            ], $this->groups[$group]['caption']),
        ], $this->groupNumbers());
    }

    public function isCorrect(string $slotId, ?int $imageId): bool
    {
        $sectionKey = $this->slots()->get($slotId);

        if ($sectionKey === null || $imageId === null) {
            return false;
        }

        return in_array($imageId, $this->sections[$sectionKey]['answers'], true);
    }

    /**
     * Score an arrangement. The pattern holds one character per slot in board order: "1" correct, "0" wrong.
     *
     * @param  array<string, int>  $placements
     * @return array{score: int, pattern: string}
     */
    public function score(array $placements): array
    {
        $pattern = collect($this->slotIds())
            ->map(fn (string $slotId): string => $this->isCorrect($slotId, $placements[$slotId] ?? null) ? '1' : '0')
            ->implode('');

        return [
            'score' => substr_count($pattern, '1'),
            'pattern' => $pattern,
        ];
    }

    /**
     * The board layout for the client. Correct answers are deliberately left out.
     *
     * @return list<array{key: string, tone: string, title: string, description: ?string, rows: list<list<array{key: string, title: string, tone: string, slots: list<string>}>>}>
     */
    public function layout(): array
    {
        return array_map(fn (array $column): array => [
            'key' => $column['key'],
            'tone' => $column['tone'],
            'title' => $column['title'],
            'description' => $column['description'],
            'rows' => array_map(fn (array $row): array => array_map(fn (string $sectionKey): array => [
                'key' => $sectionKey,
                'title' => $this->sections[$sectionKey]['title'],
                'tone' => $this->sections[$sectionKey]['tone'],
                'slots' => array_map(
                    fn (int $index): string => "{$sectionKey}-{$index}",
                    range(0, $this->sections[$sectionKey]['slots'] - 1),
                ),
            ], $row), $column['rows']),
        ], $this->columns);
    }

    /**
     * @return list<array{id: int, url: string}>
     */
    public function images(): array
    {
        return array_map(fn (int $imageId): array => [
            'id' => $imageId,
            'url' => asset("{$this->imagesPath}/{$imageId}.jpg"),
        ], $this->imageIds());
    }

    public function backgroundUrl(): string
    {
        return asset("{$this->imagesPath}/background.jpg");
    }
}
