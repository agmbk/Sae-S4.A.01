import {Injectable} from '@nestjs/common';
import {Repository} from "typeorm";
import {MatchModel} from "./models/match.model";

@Injectable()
export class MatchService {
    constructor(
        private matchRepository: Repository<MatchModel>
    ) {
    }

    async findAll(): Promise<MatchModel[]> {
        return this.matchRepository.find();
    }

    async findOne(id_match: number): Promise<MatchModel> {
        return this.matchRepository.findOneBy({id_match});
    }
}
