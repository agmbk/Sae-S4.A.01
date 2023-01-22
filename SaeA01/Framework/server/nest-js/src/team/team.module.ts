import {Module} from '@nestjs/common';
import {TypeOrmModule} from "@nestjs/typeorm";
import {TeamModel} from "./models/team.model";
import {TeamService} from './team.service';
import {TeamController} from './team.controller';


@Module({
    imports: [TypeOrmModule.forFeature([TeamModel])],
    providers: [TeamService],
    controllers: [TeamController],
})
export class TeamModule {

}
