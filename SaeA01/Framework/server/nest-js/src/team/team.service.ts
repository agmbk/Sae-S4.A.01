import {Injectable} from '@nestjs/common';
import {InjectRepository} from "@nestjs/typeorm";
import {Team} from "./models/team.model";

@Injectable()
export class TeamService {
    constructor(
        @InjectRepository(Team),
    ) {


    }
}
