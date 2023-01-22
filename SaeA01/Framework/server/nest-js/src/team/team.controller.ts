import {Controller, Get, Param, Post, Put} from '@nestjs/common';
import {TeamService} from "./team.service";

@Controller('team')
export class TeamController {
    constructor(private teamService: TeamService) {
    }

    @Get()
    findAll() {
        return this.teamService.findAll();
    }

    @Get(':id')
    findOne(@Param('id') id: string) {
        return this.teamService.findOne(id)

    }

    @Post()
    create(): string {
        return 'This action adds a new team';
    }

    @Put()
    update(): string {
        return 'This action updates a team';
    }
}
