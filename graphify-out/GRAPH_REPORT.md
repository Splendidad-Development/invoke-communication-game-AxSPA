# Graph Report - invoke-communication-game  (2026-11-25)

## Corpus Check
- 97 files · ~22,671 words
- Verdict: corpus is large enough that graph structure adds value.
- Unclassified: 23 file(s) not represented in the graph (top: (none) 17, .example 1, .pptx 1)

## Summary
- 657 nodes · 1017 edges · 42 communities (26 shown, 16 thin omitted)
- Extraction: 97% EXTRACTED · 3% INFERRED · 0% AMBIGUOUS · INFERRED: 31 edges (avg confidence: 0.85)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `42b561bd`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- SymphonyBoard
- ResultModal.vue
- package.json
- Answer
- GameFlowTest.php
- Illuminate\Database\Schema\Blueprint
- Board.vue
- types/game.ts
- with
- compilerOptions
- index.ts
- AppServiceProvider.php
- scripts
- useStickyEdgeScroll
- SymphonyBoard.php
- require-dev
- updates
- composer.json
- useBoardArrangement
- ImagePickerModal.vue
- config
- Pest.php
- require
- psr-4
- extra
- pnpm-workspace.yaml
- BoardSlot.vue
- lib/game.ts
- GameModal.vue

## God Nodes (most connected - your core abstractions)
1. `SymphonyBoard` - 31 edges
2. `compilerOptions` - 19 edges
3. `vue` - 16 edges
4. `scripts` - 13 edges
5. `Arrangement` - 12 edges
6. `require-dev` - 12 edges
7. `playAs()` - 11 edges
8. `Answer` - 11 edges
9. `Player` - 11 edges
10. `@inertiajs/vue3` - 10 edges

## Surprising Connections (you probably didn't know these)
- `{closure#2}()` --references--> `Arrangement`  [EXTRACTED]
  app/Http/Middleware/HandleInertiaRequests.php → app/Models/Arrangement.php
- `barClass()` --calls--> `cn()`  [EXTRACTED]
  resources/js/components/game/SymphonyNotes.vue → resources/js/lib/utils.ts
- `BoardController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/BoardController.php → app/Http/Controllers/Controller.php
- `notes` --calls--> `patternToNotes()`  [EXTRACTED]
  resources/js/components/game/ResultModal.vue → resources/js/lib/symphony.ts
- `useBoardArrangement()` --calls--> `shuffle()`  [EXTRACTED]
  resources/js/composables/useBoardArrangement.ts → resources/js/lib/game.ts

## Import Cycles
- None detected.

## Communities (42 total, 16 thin omitted)

### Community 0 - "SymphonyBoard"
Cohesion: 0.05
Nodes (17): AnswerController, ArrangementController, BoardController, Controller, GameController, PlayerController, EnsurePlayerSession, {closure#1}() (+9 more)

### Community 1 - "ResultModal.vue"
Cohesion: 0.05
Nodes (45): leaderboard, filter, filters, isPlaying(), leaderboard, player, playKey(), rows (+37 more)

### Community 2 - "package.json"
Cohesion: 0.05
Nodes (54): dependencies, clsx@^2.1.1, concurrently@^10.0.3, @inertiajs/vite@^3.0.0, laravel-vite-plugin@^3.1, tailwind-merge@^3.2.0, tailwindcss@^4.1.1, @tailwindcss/vite@^4.1.11 (+46 more)

### Community 3 - "Answer"
Cohesion: 0.06
Nodes (9): Answer, Arrangement, Player, User, AnswerFactory, ArrangementFactory, PlayerFactory, UserFactory (+1 more)

### Community 4 - "GameFlowTest.php"
Cohesion: 0.09
Nodes (26): {closure#10}(), {closure#11}(), {closure#12}(), {closure#13}(), {closure#14}(), {closure#15}(), {closure#16}(), {closure#17}() (+18 more)

### Community 5 - "Illuminate\Database\Schema\Blueprint"
Cohesion: 0.10
Nodes (11): {closure#1}(), {closure#2}(), {closure#3}(), {closure#1}(), {closure#2}(), {closure#1}(), {closure#2}(), {closure#3}() (+3 more)

### Community 6 - "Board.vue"
Cohesion: 0.06
Nodes (24): imageMap(), board, BoardView, edgeScroll, imagesById, isLocked, isMistakesOpen, isPhone (+16 more)

### Community 7 - "types/game.ts"
Cohesion: 0.06
Nodes (23): @inertiajs/vue3@^3.0.0, @inertiajs/vue3, answer, Auth, User, ArrangementResult, BoardSection, ColumnTone (+15 more)

### Community 8 - "with"
Cohesion: 0.10
Nodes (20): runs-on, steps, jobs, ci, name, on, pull_request, push (+12 more)

### Community 9 - "compilerOptions"
Cohesion: 0.10
Nodes (20): compilerOptions, allowJs, esModuleInterop, forceConsistentCasingInFileNames, isolatedModules, jsx, jsxImportSource, lib (+12 more)

### Community 10 - "index.ts"
Cohesion: 0.20
Nodes (4): emit, emit, emit, BoardColumn

### Community 13 - "scripts"
Cohesion: 0.15
Nodes (13): scripts, ci:check, dev, lint, lint:check, post-autoload-dump, post-create-project-cmd, post-root-package-install (+5 more)

### Community 14 - "useStickyEdgeScroll"
Cohesion: 0.67
Nodes (6): useStickyEdgeScroll(), onPointerMove(), scrollDirection(), start(), stop(), tick()

### Community 15 - "SymphonyBoard.php"
Cohesion: 0.14
Nodes (4): {closure#3}(), {closure#4}(), {closure#5}(), {closure#7}()

### Community 16 - "require-dev"
Cohesion: 0.17
Nodes (12): require-dev, fakerphp/faker, larastan/larastan, laravel/boost, laravel/pail, laravel/pao, laravel/pint, laravel/sail (+4 more)

### Community 17 - "updates"
Cohesion: 0.17
Nodes (11): default-days, patterns, github-actions, interval, updates, cooldown, directory, groups (+3 more)

### Community 18 - "composer.json"
Cohesion: 0.18
Nodes (10): autoload-dev, psr-4, description, keywords, license, minimum-stability, name, Tests\\ (+2 more)

### Community 20 - "useBoardArrangement"
Cohesion: 0.29
Nodes (7): TRAY, useBoardArrangement(), place(), removeFromTray(), reset(), slotOf(), shuffle()

### Community 21 - "ImagePickerModal.vue"
Cohesion: 0.28
Nodes (8): available, confirm(), emit, onKeydown(), props, selected, step(), track

### Community 22 - "config"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 24 - "require"
Cohesion: 0.33
Nodes (6): require, inertiajs/inertia-laravel, laravel/framework, laravel/tinker, laravel/wayfinder, php

### Community 25 - "psr-4"
Cohesion: 0.40
Nodes (5): autoload, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\

### Community 30 - "extra"
Cohesion: 0.67
Nodes (3): extra, laravel, dont-discover

### Community 44 - "BoardSlot.vue"
Cohesion: 0.22
Nodes (8): emit, isPhone, list, onAdd(), props, isPhone, usePhoneLayout(), dragOptions

### Community 45 - "lib/game.ts"
Cohesion: 0.19
Nodes (7): vue, emit, props, slotStyle, colourKey, sectionToneClasses, *.vue

### Community 47 - "GameModal.vue"
Cohesion: 0.23
Nodes (12): activate(), deactivate(), emit, id, isMounted, isTopmost(), onKeydown(), openStack (+4 more)

## Knowledge Gaps
- **16 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `vue` connect `lib/game.ts` to `ResultModal.vue`, `package.json`, `Board.vue`, `types/game.ts`, `BoardSlot.vue`, `GameModal.vue`, `useBoardArrangement`, `ImagePickerModal.vue`?**
  _High betweenness centrality (0.051) - this node is a cross-community bridge._
- **Should `SymphonyBoard` be split into smaller, more focused modules?**
  _Cohesion score 0.05058717253839205 - nodes in this community are weakly interconnected._
- **Why does `SymphonyBoard` connect `SymphonyBoard` to `Answer`, `AppServiceProvider.php`, `GameFlowTest.php`, `SymphonyBoard.php`?**
  _High betweenness centrality (0.043) - this node is a cross-community bridge._
- **Should `ResultModal.vue` be split into smaller, more focused modules?**
  _Cohesion score 0.05310734463276836 - nodes in this community are weakly interconnected._
- **Why does `@inertiajs/vue3` connect `types/game.ts` to `ResultModal.vue`, `package.json`, `Board.vue`?**
  _High betweenness centrality (0.018) - this node is a cross-community bridge._
- **Should `package.json` be split into smaller, more focused modules?**
  _Cohesion score 0.05075187969924812 - nodes in this community are weakly interconnected._
- **Should `Answer` be split into smaller, more focused modules?**
  _Cohesion score 0.055191256830601096 - nodes in this community are weakly interconnected._