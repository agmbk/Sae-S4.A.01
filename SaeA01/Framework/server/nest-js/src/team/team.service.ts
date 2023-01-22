import {Injectable} from '@nestjs/common';
import {Repository} from "typeorm";
import {TeamModel} from "./models/team.model";

@Injectable()
export class TeamService {
    constructor(
        private teamRepository: Repository<TeamModel>
    ) {
    }

    async findAll(): Promise<TeamModel[]> {
        return this.teamRepository.find();
    }

    async findOne(libelle: string): Promise<TeamModel> {
        return this.teamRepository.findOneBy({libelle});
    }
}
